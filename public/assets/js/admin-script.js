$(document).ready(function () {
    $.each($('.donate-chart'), function () {
        const options = {
            series: JSON.parse($(this).attr('series')) || [50, 25, 25],
            labels: JSON.parse($(this).attr('labels').replace(/'/g, '"')) || [
                (1, 2, 3),
            ],
            legend: {
                position: 'bottom',
                floating: false,
                itemMargin: {
                    horizontal: 100,
                    vertical: 5,
                },
            },
            colors: ['#FF7675', '#6C5CE7', '#FFA62B', '#FFEAA7'],
            title: {
                text: this.title,
                align: 'left',
            },
            chart: {
                type: 'donut',
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '50%',
                        labels: {
                            show: false,
                            total: {
                                show: true,
                                label: 'Total',
                            },
                        },
                    },
                },
            },
            dataLabels: {
                enabled: false,
            },
            responsive: [
                {
                    breakpoint: 324,
                    options: {
                        chart: {
                            width: 200,
                        },
                        legend: {
                            position: 'bottom',
                        },
                    },
                },
            ],
        };
        const chart = new ApexCharts(this, options);
        chart.render();
    });

    let table = new DataTable('#all-user-table', {
        initComplete: function () {
            // Access the search input field and set a placeholder
            const searchInput = document.querySelector(
                '[type="search"][aria-controls="all-user-table"]',
            );
            if (searchInput) {
                searchInput.placeholder = 'Search for user etc...';
                searchInput.previousSibling.innerHTML = `<i class="fa-solid fa-magnifying-glass"></i>`;
                searchInput.previousSibling.classList.add(
                    'all-user-table-label',
                );
            }
        },
    });

    typeof NiceSelect !== 'undefined' &&
        NiceSelect.bind &&
        $.each($('select'), function (index, selector) {
            const id = $(selector).attr('id');
            const searchable = $(selector).attr('searchable');
            const options = {
                searchable: searchable == 'true' || false,
                placeholder: 'select',
                searchtext: 'Search',
                selectedtext: 'geselecteerd',
            };

            NiceSelect.bind(document.getElementById(id), options);
        });

    $(document).on('click', '.notification-card .btn-delete', function () {
        $(this)
            .closest('.notification-card')
            .fadeOut(300, () => {
                $(this).remove();
            });
    });
});
