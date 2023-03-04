export default function useToast() {
    const getToastInstance = (instance) => {
        return instance.appContext.app.$toast;
    };

    const pushToast = (message, instance) => {
        instance.show(message);
    };

    const pushSuccessToast = (message, instance) => {
        instance.success(message);
    };

    const pushErrorToast = (message, instance) => {
        instance.error(message);
    };

    const pushWarningToast = (message, instance) => {
        instance.warning(message);
    };

    const pushInfoToast = (message, instance) => {
        instance.info(message);
    };

    const closeAllToasts = () => {
        setTimeout(toast().clear, 3000);
    };

    return {
        getToastInstance,
        pushToast,
        pushSuccessToast,
        pushErrorToast,
        pushWarningToast,
        pushInfoToast,
        closeAllToasts,
    };
}
