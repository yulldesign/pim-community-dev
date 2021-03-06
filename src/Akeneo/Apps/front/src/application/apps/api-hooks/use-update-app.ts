import {useContext} from 'react';
import {App} from '../../../domain/apps/app.interface';
import {fetchResult} from '../../shared/fetch-result';
import {isErr} from '../../shared/fetch-result/result';
import {NotificationLevel, useNotify} from '../../shared/notify';
import {useRoute} from '../../shared/router';
import {TranslateContext} from '../../shared/translate';

interface ResultError {
    message: string;
    errors: Array<{
        name: string;
        reason: string;
    }>;
}

export const useUpdateApp = (code: string) => {
    const url = useRoute('akeneo_apps_update_rest', {code});
    const notify = useNotify();
    const translate = useContext(TranslateContext);

    return async (app: App) => {
        const result = await fetchResult<never, ResultError>(url, {
            method: 'POST',
            headers: [['Content-type', 'application/json']],
            body: JSON.stringify({
                code: app.code,
                label: app.label,
                flow_type: app.flowType,
                image: app.image,
            }),
        });
        if (isErr(result)) {
            if (result.error.errors) {
                result.error.errors.forEach(({reason}) => notify(NotificationLevel.ERROR, translate(reason)));
            } else {
                notify(NotificationLevel.ERROR, translate('pim_apps.edit_app.flash.error'));
            }

            return result;
        }

        notify(NotificationLevel.SUCCESS, translate('pim_apps.edit_app.flash.success'));

        return result;
    };
};
