      <!-- Button (blue), duh! -->
      <!-- Dialog (full screen) -->
      <div class="absolute top-0 left-0 flex items-center content-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5); display:none;" x-show="showModalAtribuicao"  >

        <!-- A basic modal dialog with title, body and one button to close -->
        <div class="h-auto w-auto text-center bg-white rounded shadow-xl" @click.away="showModalAtribuicao = false">
          <div class="mt-3 text-center w-full" >
            <h2 class="text-lg font-medium leading-6 text-gray-900 mb-5">
              <strong>Incluir Atribuição</strong>
            </h2>

            <form x-model="frmAtribuicaoProfissional" x-data="atribuicao()" name="frmAtribuicaoProfissional" id="frmAtribuicaoProfissional" x-on-click.prevent = "">

                <div class="w-full rounded overflow-hidden shadow-lg mt-5">

                    <div class="flex mb-2">

                        <div class="w-full text-left py-2 ml-2">
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='selectAtribuicao'>
                                Atribuição
                            </label>
                            <select x-model="atribuicao.codigo_atribuicao" class="atribuicao_profissional form-control w-full" style="width: 700px" name="selectAtribuicao" id="selectAtribuicao"></select>
                        </div>
                    </div>

                    <button x-on:click.prevent="salvarAtribuicaoProfissional()" class="inline-flex justify-center mt-8 ml-5 w-24 px-3 py-1 text-white bg-blue-500 rounded-2xl hover:bg-blue-700">
                        <i class="fas fa-check">&nbsp;Incluir</i>
                    </button>

                </div>

            </form>

        </div>
      </div>

    <script type="text/javascript">

        jQuery(document).ready(function ($){

            $('.atribuicao_profissional').select2({
                minimumInputLength: 3,
                language: "pt-BR",
                ajax: {
                    url: '/atribuicao/listaatribuicao',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (response) {
                        return {
                            results:response
                        };
                    },
                    cache: true
                }
                });
        });
    </script>


