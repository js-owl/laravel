<div class="mb-3"><x-form-select name="brand_id" label="Марка авто" :options="$brands" placeholder='Не выбрана' /></div>
<div class="mb-3"><x-form-input name="model" label="Модель авто" /></div>
<div class="mb-3"><x-form-input name="vin" label="VIN" /></div>
<div class="mb-3"><x-form-select name="transmission" label="Коробка передач" :options="$transmissions" placeholder='Не выбрано' /></div>
<div class="mb-3"><x-form-select name="tags[]" label="Тэги" :options="$tags" multiple :size="$tags->count()" many-relation /></div>
@error('tags.*')
    <div class="alert alert-danger my-2">{{ $message }}</div>
@enderror

