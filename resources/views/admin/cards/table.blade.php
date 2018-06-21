<div class="table-responsive list-records">
    <table class="table table-hover table-bordered">
        <thead>
            <!--<th style="width: 10px;"><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>-->
            <th>#</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Tags</th>
            <th>Note</th>
            <th>Display Type</th>
            <th>Card Type</th>

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
                <td>@include('admin.cards.partials.question', $record)</td>
                <td>@include('admin.cards.partials.answer', $record)</td>
                <td>{{ $record->getTags() }}</td>
                <td>{{ 'WIP' }}</td>
                <td>{{ $record->getDisplayType() }}</td>
                <td>{{ $record->getCardType() }}</td>



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
