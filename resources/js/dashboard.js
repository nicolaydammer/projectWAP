const sortables = document.getElementsByClassName('sortable');

for (let i = 0; i < sortables.length; i++) {
    sortables[i].addEventListener('click', function (event) {
        let url = document.URL
        let sort_by = event.currentTarget.dataset.sortby

    });
}
