@extends('layouts.app')

@section("content")

    <form method="post" action="{{ route("admin.details.store") }}">
        @csrf
        @include("layouts.messagebox")
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" aria-describedby="title" placeholder="Title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" aria-describedby="Description" placeholder="Title">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="group">Group</label>
            <select class="form-control" name="group">
                @foreach ($groups as $group)
                    <option value={{ $group->id }}>{{ $group->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select class="form-control" name="tags" multiple>
                @foreach ($tags as $tag)
                    <option value={{ $tag->id }}>{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-check">
            <h5>Duration type:</h5>
            <input class="form-check-input typeRadio" type="radio" id="date" name="typeTime" aria-describedby="date" value="date" checked>
            <label class="form-check-label" for="date">Date to Date</label>
        </div>
        <div class="form-check">

            <input class="form-check-input typeRadio" type="radio" id="during" name="typeTime" aria-describedby="during"  value="during">
            <label class="form-check-label" for="during">Number of years</label>
        </div>
        <br>
        <div class="form-group" id="timeDiv">
            <label for="dateBeginning">Start</label>
            <input type="date" class="form-control w-25 @error('dateBeginning') is-invalid @enderror" id="dateBeginning" name="dateBeginning" aria-describedby="dateBeginning" placeholder="Start" value="{{ old('dateBeginning') }}">
            to
            <label for="dateEnding">End</label>
            <input type="date" class="form-control w-25 @error('dateEnding') is-invalid @enderror" id="dateEnding" name="dateEnding" aria-describedby="dateEnding" placeholder="End" value="{{ old('dateEnding') }}">
        </div>
        <div class="form-group d-none" id="duringDiv">
            <label for="timePassed">Date to Date</label>
            <select class="form-control" name="timePassed">
                @for ($i = 0; $i < 10; $i++)
                    <option value="{{ $i }}">{{ $i }} years</option>
                @endfor
            </select>
        </div>

        <fieldset class="mb-2">
            <legend>More informations</legend>
            <div class="table-responsive-lg">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" style="width:25%">Title</th>
                        <th scope="col" style="width:45%">Description</th>
                        <th scope="col" style="width:20%">Link</th>
                        <th scope="col" style="width:10%">Date</th>
                        <th scope="col" style="width:10%">action</th>
                    </tr>
                    </thead>
                    <tbody id="interactiveBody">
                        <tr class="d-none" id="hiddenRow">
                            <input type="hidden" class="idHidden" name="info_id" value="empty" disabled>
                            <td><input type="text" placeholder="Title" class="form-control" name="info_title[]" disabled></td>
                            <td><textarea placeholder="Description" class="form-control" name="info_description[]" disabled></textarea></td>
                            <td><input type="url" placeholder="Website" class="form-control" name="info_link[]" disabled></td>
                            <td><input type="date" placeholder="Date" class="form-control" name="info_date[]" disabled></td>
                            <td><a class="btn btn-danger active deleteRow">Delete</a></td>
                        </tr>
                        <tr>
                            <input type="hidden" class="idHidden" name="info_id" value="empty">
                            <td><input type="text" placeholder="Title" class="form-control"  name="info_title[]"></td>
                            <td><textarea placeholder="Description" class="form-control"  name="info_description[]"></textarea></td>
                            <td><input type="url" placeholder="Website" class="form-control"  name="info_link[]"></td>
                            <td><input type="date" placeholder="Date" class="form-control"  name="info_date[]"></td>
                            <td><a class="btn btn-danger active deleteRow">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </table>
            <input type="button" class="btn btn-success active" id="addRow" value="Add">
        </fieldset>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    @include("layouts.modal")
@endsection
