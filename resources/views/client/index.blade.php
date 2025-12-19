<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urbano Express - Crear Orden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Crear Nueva Orden</h4>
                    </div>
                    <div class="card-body">
                        <form id="orderForm">
                            <div class="mb-3">
                                <label for="client_name" class="form-label">Nombre del Cliente</label>
                                <input type="text" class="form-control" id="client_name" name="client_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="client_email" class="form-label">Email del Cliente</label>
                                <input type="email" class="form-control" id="client_email" name="client_email" required>
                            </div>

                            <h5 class="mt-4">Detalles de Envío</h5>
                            <div class="mb-3">
                                <label for="shipping_address" class="form-label">Dirección de Envío</label>
                                <input type="text" class="form-control" id="shipping_address" name="shipping_address" required>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="city" class="form-label">Ciudad</label>
                                    <input type="text" class="form-control" id="city" name="city" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state" class="form-label">Provincia</label>
                                    <input type="text" class="form-control" id="state" name="state" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="postal_code" class="form-label">Código Postal</label>
                                    <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                                </div>
                            </div>
                            
                            <h5 class="mt-4">Ítems</h5>
                            <div id="items-container">
                                <div class="row mb-2 item-row">
                                    <div class="col-md-5">
                                        <input type="number" class="form-control" name="items[0][product_id]" placeholder="ID Producto" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" class="form-control" name="items[0][quantity]" placeholder="Cant" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" class="form-control" name="items[0][price]" step="0.01" placeholder="Precio" required>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-secondary btn-sm mb-3" id="addItem">Agregar Ítem</button>

                            <div class="mb-3">
                                <label for="total_amount" class="form-label">Monto Total</label>
                                <input type="number" class="form-control" id="total_amount" name="total_amount" step="0.01" readonly>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Enviar Orden</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @vite(['resources/js/client/index.js'])
</body>
</html>
