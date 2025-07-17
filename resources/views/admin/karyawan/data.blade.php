@foreach ($data as $key => $v)
    <tr class="text-start text-gray-600 fs-7">
        <td>
            <span class="fw-semibold">
                {{ ++$i }}
            </span>
        </td>
        <td>
            <span class="fw-semibold">
                {{ $v->nama_cluster }}
            </span>
        </td>

        <td>
            <span class="fw-semibold">
                {{ $v->custody }}
            </span>
        </td>

        <td>
            <span class="fw-semibold">
                {{ $v->driver }}
            </span>
        </td>
        <td class="text-end">
            {!! Helper::btnAction($v->id, $title) !!}
        </td>
    </tr>
@endforeach
