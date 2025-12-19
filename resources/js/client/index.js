$(document).ready(function() {
    var contItem = 1;

    $('#addItem').click(function() {
        const html = `
            <div class="row mb-2 item-row">
                <div class="col-md-5">
                    <input type="number" class="form-control" name="items[${contItem}][product_id]" placeholder="ID de producto" required>
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" name="items[${contItem}][quantity]" placeholder="Cant" required>
                </div>
                <div class="col-md-4">
                    <input type="number" class="form-control" name="items[${contItem}][price]" step="0.01" placeholder="Precio" required>
                </div>
            </div>
        `;
        $('#items-container').append(html);
        contItem++;
    });

    $(document).on('input', 'input[name$="[quantity]"], input[name$="[price]"]', function() {
        let total = 0;
        $('.item-row').each(function() {
            const cant = parseFloat($(this).find('input[name$="[quantity]"]').val()) || 0;
            const precio = parseFloat($(this).find('input[name$="[price]"]').val()) || 0;
            total += cant * precio;
        });
        $('#total_amount').val(total.toFixed(2));
    });

    $('#orderForm').on('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const data = {
            client_name: formData.get('client_name'),
            client_email: formData.get('client_email'),
            shipping_address: formData.get('shipping_address'),
            city: formData.get('city'),
            state: formData.get('state'),
            postal_code: formData.get('postal_code'),
            total_amount: formData.get('total_amount'),
            items: []
        };

        const itemsContainer = document.getElementById('items-container');
        const items = itemsContainer.getElementsByClassName('item-row');
        
        for(let item of items) {
            const pid = item.querySelector('input[name*="[product_id]"]').value;
            const cant = item.querySelector('input[name*="[quantity]"]').value;
            const precio = item.querySelector('input[name*="[price]"]').value;
            if(pid) {
                data.items.push({
                    product_id: pid,
                    quantity: cant,
                    price: precio
                });
            }
        }

        $.ajax({
            url: '/api/v1/orders',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Orden creada exitosamente',
                    text: 'ID: ' + response.id,
                    showConfirmButton: false,
                    timer: 2000
                });
                $('#orderForm')[0].reset();
                $('#items-container').html('');
                contItem = 1;
                $('#addItem').click();
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error al crear la orden',
                    showConfirmButton: true,
                });
            }
        });
    });
});
