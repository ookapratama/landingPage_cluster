@foreach ($data as $key => $v)
    <tr class="text-start text-gray-600 fs-7">
        <td>
            <span class="fw-semibold">
                {{ ++$i }}
            </span>
        </td>
        <td>
            <span class="fw-semibold">
                {{ $v->nama }}
            </span>
        </td>
        <td>
            {{-- Tampilkan anggota jika ada relasi --}}
            @if ($v->anggota_cluster && $v->role_anggota)
                <ul class="list-unstyled mb-0">
                    @foreach (explode(',', $v->anggota_cluster) as $i => $anggota)
                        @php
                            $role = explode(',', $v->role_anggota);
                        @endphp
                        <li>
                            <br>
                            <strong>{{ $anggota . ' - ' . $role[$i] ?? 'N/A' }}</strong>
                        </li>
                    @endforeach
                </ul>
            @else
                {{-- Jika hanya ada user_ids string --}}
                @if (isset($cluster->user_ids))
                    <small class="text-muted">
                        User IDs:
                        {{ is_array($cluster->user_ids) ? implode(', ', $cluster->user_ids) : $cluster->user_ids }}
                    </small>
                @else
                    <small class="text-muted">Tidak ada anggota</small>
                @endif
            @endif
        </td>
        <td>
            <span class="fw-semibold">
                {{ ucfirst($v->shift) }}
            </span>
        </td>
        <td class="text-end">
            {!! Helper::btnAction($v->id, $title) !!}
        </td>
    </tr>
@endforeach
