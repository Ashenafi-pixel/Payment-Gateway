<div class="card-tools">
        <a href="{{ route('admin.banks.create') }}" class="btn btn-theme-effect mt-2">
            Add New Bank
        </a>
    </div>
    <br>
<div class="card-tools">
</div>
<div class="table-responsive table-nowrap d-box p-0 border-radius-0">
    <table class="table">
        <thead class="sticky-top">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Bank Name') }}</th>
                <th>{{ __('Created Date') }}</th>
                <th>{{ __('Swift Code') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1;
            @endphp
            @forelse($banks as $bank)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $bank->name ?? \App\Helpers\GeneralHelper::EMPTY_DASHES() }}</td>
                <td>{{ \App\Helpers\GeneralHelper::FORMAT_DATE($bank->created_at) }}</td>
                <td>{{ $bank->swift_code ?? \App\Helpers\GeneralHelper::EMPTY_DASHES() }}</td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-green-light flex-mode" type="button" id="action"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="material-symbols-outlined">
                                more_vert
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end animated zoomIn" aria-labelledby="action">
                            <a class="dropdown-item flex-mode" href="{{ route('admin.banks.edit', ['bank'=>$bank]) }}">
                                <span class="material-symbols-outlined">
                                    edit_note
                                </span>
                                <span>{{ __('Edit') }}</span>
                            </a>

                            <a class="dropdown-item flex-mode"
                                href="{{ route('admin.bank-service.index', ['bank'=>$bank]) }}">
                                <span class="material-symbols-outlined">
                                    Add
                                </span>
                                <span>{{ __('Services') }}</span>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            @include('backend.partials.no-table-data')
            @endforelse
        </tbody>
    </table>
</div>