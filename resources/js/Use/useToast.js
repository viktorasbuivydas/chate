import { getCurrentInstance } from "vue";

export default function useToast() {
    const toast = () => {
        return getCurrentInstance().appContext.app.$toast;
    };

    const pushToast = (message) => {
        toast().show(message);
    };

    const pushSuccessToast = (message) => {
        toast().success(message);
    };

    const pushErrorToast = (message) => {
        toast().error(message);
    };

    const pushWarningToast = (message) => {
        toast().warning(message);
    };

    const pushInfoToast = (message) => {
        toast().info(message);
    };

    const closeAllToasts = () => {
        setTimeout(toast().clear, 3000);
    };

    return {
        toast,
        pushToast,
        pushSuccessToast,
        pushErrorToast,
        pushWarningToast,
        pushInfoToast,
        closeAllToasts,
    };
}
