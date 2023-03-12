export default function useTab() {
    const isActive = (tab) => {
        return route().current() === tab;
    };

    const isActiveWithParams = (tab, paramKey, paramValue) => {
        return (
            route().current() === tab && route().params[paramKey] === paramValue
        );
    };

    return {
        isActive,
        isActiveWithParams,
    };
}
