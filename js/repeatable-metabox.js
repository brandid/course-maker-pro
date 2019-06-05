jQuery(document).ready(function ($) {
    var Repeatable_Configuration = {
        init: function () {
            this.add();
            this.remove();
        },
        clone_repeatable: function (row) {
            var key, highest, clone;

            key = highest = 1;
            row.parent().find('.repeatable-repeatable-row').each(function () {
                var current = $(this).data('key');
                if (parseInt(current) > highest) {
                    highest = current;
                }
            });

            highest += 1;
            key = highest;

            clone = row.clone();
            clone.find('select').each(function () {
                $(this).val(row.find('select[name="' + $(this).attr('name') + '"]').val());
            });

            clone.attr('data-key', key);
            clone.find('td input, td select, textarea').val('');
            clone.find('input, select, textarea').each(function () {
                var name = $(this).attr('name');

                name = name.replace(/\[(\d+)\]/, '[' + parseInt(key) + ']');
                $(this).attr('name', name).attr('id', name);
            });

            clone.find('.repeatable-remove-repeatable').css('display', 'inline-block');

            return clone;
        },
        add: function() {
           $('body').on('click', '.submit .repeatable-add-repeatable', function (e) {
               e.preventDefault();

               var button = $(this),
                   row = button.parent().parent().prev('tr'),
                   clone = Repeatable_Configuration.clone_repeatable(row);

               clone.insertAfter(row);
           });
       },
       remove: function() {
            $('body').on('click', '.repeatable-remove-repeatable', function (e) {
                e.preventDefault();

                var row = $(this).parent().parent('tr'),
                    count = row.parent().find('tr').length - 1;

                if (count > 1) {
                    $('input, select', row).val('');
                    row.fadeOut('fast').remove();
                } else {
                    $('input, select', row).val('');
                }
            });
        }
    };

    Repeatable_Configuration.init();
});
