
var data = function($) {
    var
    actions_registry = {},
    /**
     * @param string table_id
     * @param string action_id
     * @param string type 'SIGNAL' | 'URL'
     * @param mixed target
     * @param string parameter_name
     */
    registerAction = function(table_id, action_id, type, target, parameter_name) {
        var r = actions_registry[table_id] || {};
        r[action_id] = {
            type : type,
            target : target,
            param : parameter_name
        };
        actions_registry[table_id] = r;
    },
    /**
     * @param string table_id
     * @param array signal_data
     * @param array row_ids
     */
    doAction = function(table_id, signal_data, row_ids) {
        var act_id = signal_data.options.action,
            action = actions_registry[table_id][act_id],
            target;

        if(action.type === 'URL') {
            target = amendParameterToUrl(action.target, action.param, row_ids);
             window.location.href = target;
        }
        if(action.type === 'SIGNAL') {
            target = amendParameterToSignal(action.target, action.param, row_ids);
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
        registerAction: registerAction,
        doAction: doAction,
        collectSelectedRowIds: collectSelectedRowIds
    };
    return public_interface;
}

export default data;
