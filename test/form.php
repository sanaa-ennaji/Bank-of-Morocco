<section id="form-wrapper" class="h-[20vh] w-[30%] m-auto bg-white rounded flex justify-center items-center absolute top-2/4 left-2/4 translate-x-[-50%] translate-y-[-50%] z-20 transition ease-in-out delay-15">
        <form id="form" action="testing.php" method="post" class="w-[80%] h-[90%] flex flex-col justify-evenly" autocomplete="off" enctype="multipart/form-data">
            <div class="flex justify-between">
                <div class="w-[45%] flex flex-col justify-evenly">
                    <label>Name:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="name" id="name">
                </div>
                <div class="w-[45%] flex flex-col">
                    <label>Logo:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="logo" id="logo">
                </div>
            </div>
            <div class="flex flex-col">
                <!-- <button id="edit" class="w-[30%] rounded m-auto bg-green-500 text-white p-1" type="button">SUBMIT</button>
                <button id="submit" class="w-[30%] rounded m-auto bg-green-500 text-white p-1" type="button">SUBMIT</button> -->
                <input id="submit" type="submit" name="submit" value="SUBMIT">
            </div>
        </form>
    </section>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function(){
            $("#form").on("submit", function(e){
                e.preventDefault();
                data = new FormData(this);
                data.append('submit', 1)
                console.log(data.get('name'));

                $.ajax({
                    url: 'testing.php',
                    type: 'POST',
                    data: data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(response){
                    }
                });
            });
        });
    </script>