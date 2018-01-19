<data-table :data='{{ $data }}'>
    <table-col label="Date" data-key='updated_at'></table-col>
    <table-col label="Phone Number" data-key='phoneNumber'></table-col>

    <table-col label="Choice" data-key='choice' 
    :formatter="function(choice){return choice==1?'Agree':'Disagree'}"
    ></table-col>

</data-table>
