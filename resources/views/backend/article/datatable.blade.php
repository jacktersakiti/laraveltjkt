@foreach ($articles as $item)
    <tr>
        <td class="text-center">{{ $loop->iteration }}</td>
        <td>{{ $item->title }}</td>
        <td>{{ $item->slug }}</td>
        <td>{{ $item->Category->name }}</td>
        <td>{{ $item->desc }}</td>
        <td>{{ $item->img }}</td>
        <td>{{ $item->views }} x</td>
        {{-- <td>{{ $item->status }}</td> --}}

        @if ($item->status == 0)
            <td>
                <span class="badge bg-danger">Private</span>
            </td>
        @else
            <td>
                <span class="badge bg-success">Publish</span>
            </td>
        @endif


        <td class="text-center">{{ $item->created_at }}</td>
        <td class="text-center">{{ $item->publish_date }}</td>
        <td class="text-center">
            <div class="text-center">
                <a href="" class="btn btn-xs btn-primary"><i class="fa fa-bell"></i>Detail</a>
                <a href="" class="btn btn-xs btn-warning"><i class="fa fa-bell"></i>Edit</a>
                <a href="" class="btn btn-xs btn-danger"><i class="fa fa-bell"></i>Delete</a>
            </div>
        </td>
    </tr>
@endforeach
