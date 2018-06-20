<div class="table-responsive list-records">
    <table class="table table-hover table-bordered">
        <thead>
            <!--<th style="width: 10px;"><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>-->
            <th>#</th>
            <th>Brand</th>
            <th>Class</th>
            <th>Label</th>
            <th>Dose</th>
            <th>Indication</th>
            <th>Dose/Indication</th>
            <th>Adverse Effect</th>
            <th>Counselling</th>


            <th style="width: 100px;">Actions</th>
        </thead>
        <tbody>
        @foreach ($records as $record)
            <?php
            $tableCounter++;
            $labels = [];
            $editLink = route($resourceRoutesAlias.'.edit', $record->id);
            $deleteLink = route($resourceRoutesAlias.'.destroy', $record->id);
            $formId = 'formDeleteModel_'.$record->id;
            ?>
            <tr>
            <!--<td><input type="checkbox" name="ids[]" value="{{ $record->id }}" class="square-blue"></td>-->
                <td>
                    @can('update', $record)
                        <a href="{{ $editLink }}">{{ $record->id }}</a>
                    @else {{ $record->id }} @endcan
                </td>
                <td>{{ $record->brand->name }}</td>
                <td>{{ $record->class->name }}</td>
                <td>{{ $record->getLabels() }}</td>
                <td>{{ $record->answer->dose }}</td>
                <td>{{ $record->answer->indication }}</td>
                <td>{{ $record->answer->dose_indication }}</td>
                <td>{{ $record->answer->adverse_effect }}</td>
                <td>{{ $record->answer->counselling }}</td>


                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    <div class="btn-group">
                        
                            <a href="{{ $editLink }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-sm btnOpenerModalConfirmModelDelete" data-form-id="{{ $formId }}"><i class="fa fa-trash-o"></i></a>
                    </div>

                        <!-- Delete Record Form -->
                        <form id="{{ $formId }}" action="{{ $deleteLink }}" method="POST"
                              style="display: none;" class="hidden form-inline">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
