
<script src="http://localhost:3002/socket.io/socket.io.js"></script>

<script>
var io = io('http://localhost:3002/')

    /////////////SKCK//////////////////
function nextskck(){
    $(document).ready(() => {
        $.ajax({
            type : 'GET',
            url: '{{ url("next/skck") }}',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: (data) => {
                console.log(data)
                $('#skck').html(data.no_antrean)
                io.emit('data', {jenis: 'skck', no: data.no_antrean})

            }
        })


    })


}

function recallskck(){
    $(document).ready(() => {
        $.ajax({
            type : 'GET',
            url: '{{ url("recall/skck") }}',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: (data) => {
                console.log(data)
                $('#skck').html(data.no_antrean)
                io.emit('data', {jenis: 'skck', no: data.no_antrean})
            }
        })
    })
}

//////////////////////////SKTLK//////////////////
function nextsktlk(){
    $(document).ready(() => {
        $.ajax({
            type : 'GET',
            url: '{{ url("next/sktlk") }}',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: (data) => {
                console.log(data)
                $('#sktlk').html(data.no_antrian)
                io.emit('data', {jenis : 'sktlk', no: data.no_antrian})
            }
        })
    })
}

function recallsktlk(){
    $(document).ready(() => {
        $.ajax({
            type : 'GET',
            url: '{{ url("recall/sktlk") }}',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: (data) => {
                console.log(data)
                $('#sktlk').html(data.no_antrian)
                io.emit('data', {jenis: 'sktlk', no: data.no_antrian})
            }
        })
    })
}

//////////////////LP///////////////////
function nextlp(){
    $(document).ready(() => {
        $.ajax({
            type : 'GET',
            url: '{{ url("next/lp") }}',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: (data) => {
                console.log(data)
                $('#lp').html(data.no_antrian)
                io.emit('data', {jenis: 'lp', no: data.no_antrian})
            }
        })
    })
}

function recalllp(){
    $(document).ready(() => {
        $.ajax({
            type : 'GET',
            url: '{{ url("recall/lp") }}',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: (data) => {
                console.log(data)
                $('#lp').html(data.no_antrian)
                io.emit('data', {jenis: 'lp', no: data.no_antrian})

            }
        })
    })
}

////////////////SP2HP////////////////

function nextsp2hp(){
    $(document).ready(() => {
        $.ajax({
            type : 'GET',
            url: '{{ url("next/sp2hp") }}',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: (data) => {
                console.log(data)
                $('#sp2hp').html(data.no_antrian)
                io.emit('data', {jenis: 'sp2hp', no: data.no_antrian})

            }
        })
    })
}

function recallsp2hp(){
    $(document).ready(() => {
        $.ajax({
            type : 'GET',
            url: '{{ url("recall/sp2hp") }}',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: (data) => {
                console.log(data)
                $('#sp2hp').html(data.no_antrian)
                io.emit('data', {jenis: 'sp2hp', no: data.no_antrian})

            }
        })
    })
}

</script>


