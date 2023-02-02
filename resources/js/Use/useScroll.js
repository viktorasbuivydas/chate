export default function useScroll() {
    const scrollToBottom = (elementId) => {
        setTimeout(() => {
            var scrollY = document.getElementById(elementId);
            if (!scrollY) {
                return;
            }
            scrollY.scrollTop = scrollY.scrollHeight - scrollY.clientHeight;
        }, 500);
    };

    const scrollToTop = (elementId) => {
        setTimeout(() => {
            var scrollY = document.getElementById(elementId);
            if (!scrollY) {
                return;
            }
            scrollY.scrollTop = 0;
        }, 500);
    };

    return {
        scrollToBottom,
        scrollToTop,
    };
}
