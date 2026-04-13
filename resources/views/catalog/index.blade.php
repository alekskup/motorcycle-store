@extends('layouts.app')
@section('title', 'Каталог мотоциклов')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <aside class="bg-white p-4 rounded shadow h-fit">
            <form method="GET" action="{{ route('catalog.index') }}">
                <h3 class="font-bold mb-3">Фильтр</h3>
                <label class="block mb-2 text-sm">Бренд</label>
                <select name="brand_id" class="w-full border rounded p-2 mb-3">
                    <option value="">Все</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
                <label class="block mb-2 text-sm">Цена (₽)</label>
                <div class="flex gap-2 mb-3">
                    <input type="number" name="price_min" placeholder="От" value="{{ request('price_min') }}" class="w-1/2 border rounded p-2">
                    <input type="number" name="price_max" placeholder="До" value="{{ request('price_max') }}" class="w-1/2 border rounded p-2">
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                    Применить
                </button>
            </form>
        </aside>

        <div class="md:col-span-3">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse ($motorcycles as $moto)
                    <div class="bg-white rounded shadow p-4 hover:shadow-md transition">
                        <h3 class="font-bold text-lg">{{ $moto->brand->name }} {{ $moto->name }}</h3>
                        <p class="text-gray-500 text-sm">{{ $moto->year }} г.</p>
                        <p class="text-xl font-semibold mt-2 text-blue-700">
                            {{ number_format($moto->price, 0, '.', ' ') }} ₽
                        </p>
                        <a href="#" class="inline-block mt-3 text-blue-600 hover:underline text-sm">Подробнее →</a>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500 py-8">Ничего не найдено</p>
                @endforelse
            </div>
            <div class="mt-6">
                {{ $motorcycles->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
