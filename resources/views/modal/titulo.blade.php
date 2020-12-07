      <!-- Button (blue), duh! -->
      <!-- Dialog (full screen) -->
      <div class="absolute top-0 left-0 flex items-center content-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="showModal"  >

        <!-- A basic modal dialog with title, body and one button to close -->
        <div class="h-auto w-auto xp-4 mx-2 text-center bg-white rounded shadow-xl md:max-w-x3 md:p- lg:p-8 md:mx-0 w-max-content" @click.away="showModal = false">
          <div class="mt-3 text-center md:mt-0 md:max-w-x2">
            <h2 class="text-lg font-medium leading-6 text-gray-900 mb-5">
              <strong>Incluir Título Acadêmico</strong>
            </h2>

            <form x-model="frmTituloProfissional" x-data="registro()" name="frmTituloProfissional" id="frmTituloProfissional" x-on-click.prevent = "">

                <div class="max-w-lg rounded overflow-hidden shadow-lg mt-5">

                    <div class="flex mb-2 ">

                        <div class="w-full text-left py-2 ml-2">
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='selectTitulo'>
                                Título
                            </label>
                            <select x-model="titulo.fk_codigo_titulo_confea" class="js-data-example-ajax form-control" style="width: 100%" name="selectTitulo" id="selectTitulo"></select>
                        </div>
                    </div>
                    <div class="flex mb-2 ">
                        <div class="w-80 text-left py-2 ml-3">
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='instituicao_ensino'>
                                Instituição
                            </label>
                            <input  x-model="titulo.instituicao_ensino" id='instituicao_ensino' name='instituicao_ensino' type='text' placeholder='Insira o nome da instituição'
                                class='appearance-none block w-80 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 h-8 leading-tight focus:outline-none focus:bg-white'>
                        </div>

                        <div class="w-36 text-left py-2 ml-3">

                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='data_conclusao'>
                                Conclusão
                            </label>
                            <input  x-model="titulo.data_conclusao" id='data_conclusao' name='data_conclusao' type='text' placeholder='Insira o data de conclusão'
                                class='appearance-none block w-36 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 h-8 leading-tight focus:outline-none focus:bg-white'>
                        </div>

                    </div>
                    <div class="flex mb-2">

                        <div class="w-36 text-left py-2 ml-3">
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='data_diploma'>
                                Data diploma
                            </label>
                            <input  x-model="titulo.data_diploma" id='data_diploma' name='data_diploma' type='text' placeholder='Insira a data de registro do diploma'
                                class='appearance-none block w-36 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 h-8 leading-tight focus:outline-none focus:bg-white'>
                        </div>

                        <div class="w-36 text-left py-2 ml-5">
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='fk_numero_processo'>
                                Nº Processo
                            </label>
                            <input  x-model="titulo.fk_numero_processo" id='fk_numero_processo' name='fk_numero_processo' type='text' placeholder='Insira o nº do processo'
                                class='appearance-none block w-36 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 h-8 leading-tight focus:outline-none focus:bg-white'>
                        </div>

                        <div class="w-36 text-left py-2 ml-5">

                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='principal'>
                                Principal
                            </label>
                            <input  x-model="titulo.principal" id='principal' name='principal' type='text' placeholder='Curso principal ?'
                                class='appearance-none block w-36 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 h-8 leading-tight focus:outline-none focus:bg-white'>
                        </div>

                    </div>

                    <button x-on:click.prevent="salvarTituloProfissional()" class="inline-flex justify-center mt-8 ml-5 w-24 px-3 py-1 text-white bg-blue-500 rounded-2xl hover:bg-blue-700">
                        <i class="fas fa-check">&nbsp;Incluir</i>
                    </button>

                </div>

            </form>

        </div>
      </div>

    <script type="text/javascript">

        jQuery(document).ready(function ($){

            $('.js-data-example-ajax').select2(
                {
                ajax: {
                    url: '/titulo/listatitulo',
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

        VMasker(document.getElementById("data_diploma")).maskPattern('99/99/9999');
        VMasker(document.getElementById("data_conclusao")).maskPattern('99/99/9999');

    </script>


