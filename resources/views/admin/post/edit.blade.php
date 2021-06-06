@extends('layoutBackend.app');
@section('sub-judul','Update Post')
@section('content')
<form method="POST" action="{{ route('post.update',$post->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" name="judul" class="form-control" value="{{ $post->judul }}" id="judul">
        @error('judul')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="category_id">Category</label>
        <select id="category_id" class="form-control" name="category_id">
            <option value="">Pilih Category</option>
            @foreach ($category as $item)
            <option value="{{ $item->id }}"
                @if ($post->category_id==$item->id);
                    selected
                @endif
                >{{ $item->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label>Tags</label>
        <select class="form-control select2" name="tags[]" multiple="">
            @foreach ($tags as $hasil)
            <option value="{{ $hasil->id }}"
                @foreach ($post->tags as $value)
                        @if ($hasil->id==$value->id)
                        selected
                        @endif
                        @endforeach
                >{{ $hasil->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea type="text" name="content" class="form-control" {{ $post->content}} id="content" rows="3">{{ $post->content}}</textarea>
        @error('content')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="thumbnail">Thumbnail</label>
        <input type="file" name="gambar" class="form-control" id="thumbnail">
        @error('gambar')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection
