<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}"
                        alt="{{ $user->name }}">
                    <div>
                        @if ($editing ?? false)
                            <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                            @error('name')
                                <span class="text-danger fs-6">{{ $message }}</span>
                            @enderror
                        @else
                            <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                                </a></h3>
                            <span class="fs-6 text-muted">@mario</span>
                        @endif
                    </div>
                </div>
                <div>
                    @auth
                        @if (Auth::id() === $user->id)
                            <a href="{{ route('users.show', $user->id) }}">View </a>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="mt-4">
                @if ($editing ?? false)
                    <label for="">Profile Picture</label>
                    <input name="image" class="form-control" type="file">
                    @error('image')
                        <span class="text-danger fs-6">{{ $message }}</span>
                    @enderror
                @endif
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                @if ($editing ?? false)
                    <div class="mb-3">
                        <textarea name="bio" class="form-control" id="bio" rows="3">{{ $user->bio }}</textarea>
                        @error('bio')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <button class="btn btn-dark btn-sm mb-3">Save</button>
                @else
                    <p class="fs-6 fw-light">
                        {{ $user->bio }}
                    </p>
                @endif
                @include('users.shared.user-stats')
            </div>
        </form>
    </div>
</div>
