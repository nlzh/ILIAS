
var data = function($) {
    var
    actions_registry = {},
    registerMultiAction = function(table_id, action_id, type, target, parameter_name) {
        var r = actions_registry[table_id] || {};
        r[action_id] = {
            type : type,
            target : target,
            param : parameter_name
        };
        actions_registry[table_id] = r;
    },
    doMultiAction = function(table_id, signal_data) {
        var act_id = signal_data.options.action,
            action = actions_registry[table_id][act_id],
            cols = collectSelectedRowIds(table_id),
            target;

        if(action.type === 'URL') {
            target = amendParameterToUrl(action.target, action.param, cols);
             window.location.href = target;
        }
        if(action.type === 'SIGNAL') {
            target = amendParameterToSignal(action.target, action.param, cols);
            $('#' + table_id).trigger(
                target.id,
                target.options
            );
        }
    },
    collectSelectedRowIds = function(table_id) {
        var table = document.getElementById(table_id),
            cols = table.getElementsByClassName('row-selector'),
            i, col, ret = [];
            for(i = 0; i < cols.length; i = i + 1) {
                col = cols[i];
                if(col.checked) {
                    ret.push(col.value);
                }
            }
            return ret;
    },
    amendParameterToSignal = function(target, parameter_name, values) {
        target = JSON.parse(target);
        target.options[parameter_name] = values;
        return target;
    },
    amendParameterToUrl = function(target, parameter_name, values) {
        var uri = '', i;
        for(i = 0; i < values.length; i = i + 1) {
            uri = uri + '&' + parameter_name  + '[]=' + values[i];
        }
        target = target + '&' + encodeURI(uri);
        return target;
    },

    public_interface = {
        registerMultiAction: registerMultiAction,
        doMultiAction: doMultiAction,
    };
    return public_interface;
}

export default data;
