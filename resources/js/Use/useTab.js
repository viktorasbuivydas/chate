export default function useTab() {
    const isActive = (tab) => {
        return route().current() === tab;
    };

    return {
        isActive,
    };
}
