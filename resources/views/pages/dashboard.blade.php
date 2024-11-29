<!-- resources/views/filament/pages/dashboard.blade.php -->

<x-filament::page>
    <div class="container">
        <!-- First Row with Widgets Side by Side -->
        <div class="row g-4">
            <!-- First Widget: Total Vehicles -->
            <div class="col-md-6">
                @livewire('filament.widgets.total-vehicle-stat-widget')
            </div>

            <!-- Second Widget: Total Payments -->
            <div class="col-md-6">
                @livewire('filament.widgets.total-payment-stat-widget')
            </div>
        </div>

        <!-- Second Row with More Widgets Below -->
        <div class="row g-4 mt-4">
            <!-- Third Widget: Vehicle Table -->
            <div class="col-md-6">
                @livewire('filament.widgets.vehicle-table-stat-widget')
            </div>

            <!-- Fourth Widget: Transaction Chart -->
            <div class="col-md-6">
                @livewire('filament.widgets.status-transaksi-chart-widget')
            </div>
        </div>
    </div>
</x-filament::page>
