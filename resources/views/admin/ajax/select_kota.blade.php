<option>--Pilih Salah Satu--</option>
@if(!empty($kota))
  @foreach($kota as $key => $value)
    <option value="{{ $value }}">{{ $key }}</option>
  @endforeach
@endif