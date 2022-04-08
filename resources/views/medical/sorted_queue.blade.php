@extends('layout.layout')

@section('content')
<div class="container" style="margin-top: 70px; min-height: 500px;">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sucesso!</strong> {{session('message')}}
        </div>
    @endif

    <h1 class="text-center" style="color: black;">Pacientes para Consulta Médica</h1>

    <table class="table table-striped table-bordered" style="margin-top: 40px;">
        <thead>
            <tr>
                <th>NOME</th>
                <th>DATA DE NASCIMENTO</th>
                <th>CNS</th>
                <th>NOME DA MÃE</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
        <tbody>
            @foreach($queue as $records)
                @if ($records->sorted)
                    <?php 
                        $citizen = $citizens->find($records->id_patient);
                        $treatment = $treatments->find($records->id_treatment);
                    ?>
                    @if (strlen($treatment->medical_conduct) == 0)
                        <tr>
                            <td>{{$citizen->name}}</td>
                            <td>{{$citizen->born_day->format('d/m/Y')}}</td>
                            <td>{{$citizen->email}}</td>
                            <td>{{$citizen->mother}}</td>
                            <td class="text-center">
                                    <a href="{{route('medical_treatment', ['id' => $citizen->id, 'attendance_id' => $records->id, 'treatment_id' => $treatment->id])}}" class="btn basic-btn"><span class="glyphicon glyphicon-pencil"></span></a>
                            </td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
