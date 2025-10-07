<div class="card-body">
    <div class="row g-3">
        <div class="col-md-12">
            <label for="name" class="form-label">Наименование<span class="required-indicator sr-only"> (required)</span></label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ old('name', $model?->name) }}">
            @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="address" class="form-label">Адрес<span class="required-indicator sr-only"></span></label>
            <input type="text" class="form-control" id="address" name="address"
                   value="{{ old('address', $model?->address) }}">
            @error('address')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="manager" class="form-label">Управител<span class="required-indicator sr-only"></span></label>
            <input type="text" class="form-control" id="manager" name="manager"
                   value="{{ old('manager', $model?->manager) }}">
            @error('manager')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Телефон<span class="required-indicator sr-only"></span></label>
            <input type="tel" class="form-control" id="phone" name="phone"
                   value="{{ old('phone', $model?->phone) }}">
            @error('phone')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="vat_number" class="form-label">ДДС Номер<span class="required-indicator sr-only"></span></label>
            <input type="text" class="form-control" id="vat_number" name="vat_number"
                   value="{{ old('vat_number', $model?->vat_number) }}">
            @error('vat_number')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="tin_number" class="form-label">Идентификационен Номер<span class="required-indicator sr-only"></span></label>
            <input type="text" class="form-control" id="tin_number" name="tin_number"
                   value="{{ old('tin_number', $model?->tin_number) }}">
            @error('tin_number')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
