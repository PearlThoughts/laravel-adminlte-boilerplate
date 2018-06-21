<h4><center><strong> {{ 'Dose' }}</strong></center></h4><br>
    {{$record->answer->dose}}
    
<h4><center><strong>Indication</strong></center></h4><br>
{{  $record->answer->indication }}
<h4><center><strong>Dose/Indication</strong></center></h4><br>
{{ $record->answer->dose_indication}}
<h4><center><strong>Adverse Effect</strong></center></h4><br>
{{ $record->answer->adverse_effect}}
<h4><center><strong>Labels</strong></center></h4><br>
{{ $record->getLabels()}}
<h4><center><strong>Counselling</strong></center></h4><br>
{{ $record->answer->counselling}}
