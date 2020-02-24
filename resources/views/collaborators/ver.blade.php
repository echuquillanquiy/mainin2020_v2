<div class="text-center mb-2"> {{ $collaborator->name }} </div>

<div class="text-center">
<img src="{{ Storage::url("collaborators/photo/$collaborator->photo") }}" width="300" height="250" class="img-circle">
</div>