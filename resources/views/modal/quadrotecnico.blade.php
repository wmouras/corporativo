
      <!-- Button (blue), duh! -->
      <!-- Dialog (full screen) -->
    <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="showModalQuadroTecnico"  >

        <!-- A basic modal dialog with title, body and one button to close -->
        <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="showModalQuadroTecnico = false">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                Modal Title
                </h3>
            </div>

            <form x-model="frmQuadroTecnico" x-data="registro()" name="frmQuadroTecnico" id="frmQuadroTecnico" x-on-click.prevent = "">

                <div class="max-w-lg rounded overflow-hidden shadow-lg mt-5">

                    <div class="flex mb-2">



                    </div>

                    <button x-on:click.prevent="concluirRegistro()" class="inline-flex justify-center mt-8 ml-5 w-24 px-3 py-1 text-white bg-blue-500 rounded-2xl hover:bg-blue-700">
                        <i class="fas fa-check">&nbsp;Incluir</i>
                    </button>

                </div>

            </form>

        </div>
    </div>
