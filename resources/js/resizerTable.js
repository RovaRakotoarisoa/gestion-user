const resizers = document.querySelectorAll('.resizer');

resizers.forEach(resizer => {
    const th = resizer.parentElement;
    let startX;
    let startWidth;

    resizer.addEventListener('mousedown', (e) => {
        startX = e.pageX;
        startWidth = th.offsetWidth;
        document.addEventListener('mousemove', onMouseMove);
        document.addEventListener('mouseup', onMouseUp);
    });

    function onMouseMove(e) {
        const newWidth = startWidth + (e.pageX - startX);
        th.style.width = newWidth + 'px';
    }

    function onMouseUp() {
        document.removeEventListener('mousemove', onMouseMove);
        document.removeEventListener('mouseup', onMouseUp);
    }
});