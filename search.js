$(document).ready(function () {
    function adjustSuggestionsWidth() {
        $('#suggestions').width($('#searchBar').outerWidth());
    }


    adjustSuggestionsWidth();
    $(window).resize(function () {
        adjustSuggestionsWidth();
    });

    $('#searchBar').on('input', function () {
        let query = $(this).val().trim();
        if (query.length > 0) {
            $.ajax({
                url: 'Bikes.xml',
                dataType: 'xml',
                success: function (data) {
                    let suggestions = '';
                    $(data).find('bike').each(function () {
                        let brand = $(this).find('brand').text();
                        if (brand.toLowerCase().includes(query.toLowerCase())) {
                            suggestions += '<div class="suggestion-item" data-brand="' + brand + '">' + brand + '</div>';
                        }
                    });
                    $('#suggestions').html(suggestions).show();
                    adjustSuggestionsWidth();
                },
                error: function () {
                    $('#suggestions').html('<div class="suggestion-item">Error loading suggestions</div>').show();
                    adjustSuggestionsWidth();
                }
            });
        } else {
            $('#suggestions').hide();
        }
    });

    $('#suggestions').on('click', '.suggestion-item', function () {
        let selectedBrand = $(this).data('brand');
        window.location.href = 'searchProcess.php?search=' + encodeURIComponent(selectedBrand);
    });


    $(document).click(function (e) {
        if (!$(e.target).closest('#searchBar, #suggestions').length) {
            $('#suggestions').hide();
        }
    });
});