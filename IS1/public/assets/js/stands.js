<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const sizeSelect = $('#size');
        const quantityInput = $('#quantity');

        // Update available quantity on size change
        sizeSelect.on('change', function() {
            const selectedSize = $(this).val();
            const eventId = {{ $event->id }};
            const url = `/events/${eventId}/stands/available-quantity?size=${selectedSize}`;

            // Make an AJAX request to retrieve the available quantity
            $.get(url, function(response) {
                const availableQuantity = response.availableQuantity;
                quantityInput.attr('max', availableQuantity);
                quantityInput.val(1);
            });
        });

        // Disable quantity input if available quantity is insufficient
        quantityInput.on('input', function() {
            const availableQuantity = parseInt(quantityInput.attr('max'));
            const selectedQuantity = parseInt(quantityInput.val());

            if (selectedQuantity > availableQuantity) {
                quantityInput.val(availableQuantity);
            }
        });

        // Add Stand button click event
        $('#add-stand-button').on('click', function(e) {
            e.preventDefault();

            // Create a new form element
            var form = $('<form></form>').attr({
                'action': "{{ route('events.stands.add', ['eventId' => $event->id]) }}",
                'method': 'POST'
            });

            // Add CSRF token field
            $('<input>').attr({
                'type': 'hidden',
                'name': '_token',
                'value': "{{ csrf_token() }}"
            }).appendTo(form);

            // Add other form fields
            $('<input>').attr({
                'type': 'text',
                'name': 'type',
                'value': 'default-value'
            }).appendTo(form);

            $('<input>').attr({
                'type': 'hidden',
                'name': 'size',
                'value': 'default-value'
            }).appendTo(form);

            $('<input>').attr({
                'type': 'hidden',
                'name': 'quantity',
                'value': 'default-value'
            }).appendTo(form);

            // Append the form to the document body
            form.appendTo('body');

            // Submit the form
            form.submit();
        });
    });
</script>
