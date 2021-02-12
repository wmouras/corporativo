      <!-- Button (blue), duh! -->
      <!-- Dialog (full screen) -->
      <div class="absolute top-0 left-0 flex items-center content-center justify-center w-full h-full" style="display:none; background-color: rgba(0,0,0,.5);" x-show="showModalTitulo">

        <!-- A basic modal dialog with title, body and one button to close -->
        <div class="w-auto h-auto mx-2 text-center bg-white rounded shadow-xl xp-4 md:max-w-x3 md:p- lg:p-8 md:mx-0 w-max-content" @click.away="showModalTitulo = false">
          <div class="mt-3 text-center md:mt-0 md:max-w-x2">
            <h2 class="mb-5 text-lg font-medium leading-6 text-gray-900">
              <strong>Incluir Título Acadêmico</strong>
            </h2>

            <form x-model="frmTituloProfissional" x-data="registro()" name="frmTituloProfissional" id="frmTituloProfissional" x-on-click.prevent = "">

                <div class="max-w-lg mt-5 overflow-hidden rounded shadow-lg">

                    <div class="flex mb-2 ">

                        <div class="w-full py-2 ml-2 text-left">
                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='selectTitulo'>
                                Título
                            </label>
                            <select x-model="titulo.fk_codigo_titulo_confea" class="titulo_confea form-control" style="width: 100%" name="selectTitulo" id="selectTitulo"></select>
                        </div>
                    </div>
                    <div class="flex mb-2 ">
                        <div class="py-2 ml-3 text-left w-80">
                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='instituicao_ensino'>
                                Instituição
                            </label>
                            <input  x-model="titulo.instituicao_ensino" id='instituicao_ensino' name='instituicao_ensino' type='text' placeholder='Insira o nome da instituição'
                                class='block h-8 px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-80 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                        </div>

                        <div class="py-2 ml-3 text-left w-36">

                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='data_conclusao'>
                                Conclusão
                            </label>
                            <input  x-model="titulo.data_conclusao_curso" id='data_conclusao_curso' name='data_conclusao_curso' type='text' placeholder='Insira o data de conclusão'
                                class='block h-8 px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-36 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                        </div>

                    </div>
                    <div class="flex mb-2">

                        <div class="py-2 ml-3 text-left w-36">
                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='data_diploma'>
                                Data diploma
                            </label>
                            <input  x-model="titulo.data_diploma" id='data_diploma' name='data_diploma' type='text' placeholder='Insira a data de registro do diploma'
                                class='block h-8 px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-36 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                        </div>

                        <div class="py-2 ml-5 text-left w-36">
                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='fk_numero_processo'>
                                Nº Processo
                            </label>
                            <input  x-model="titulo.fk_numero_processo" id='fk_numero_processo' name='fk_numero_processo' type='text' placeholder='Insira o nº do processo'
                                class='block h-8 px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-36 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                        </div>

                        <div class="py-2 ml-5 text-left w-36">

                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='principal'>
                                Principal
                            </label>
                            <select x-model="titulo.principal"
                            class='block px-4 py-3 mb-3 text-sm leading-tight text-gray-700 border rounded appearance-none h8 w-36 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'
                            name="principal" id="principal">
                                <option value="0"> Selecione </option>
                                <option value="1"> SIM </option>
                                <option value="2"> NÃO </option>
                            </select>
                        </div>

                    </div>

                    <button x-on:click.prevent="salvarTituloProfissional()" class="inline-flex justify-center w-24 px-3 py-1 mt-8 ml-5 text-white bg-blue-500 rounded-2xl hover:bg-blue-700">
                        <i class="fas fa-check">&nbsp;Incluir</i>
                    </button>

                </div>

            </form>

        </div>
      </div>

    <script type="text/javascript">

        jQuery(document).ready(function ($){

            $('.titulo_confea').select2(
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
        VMasker(document.getElementById("data_conclusao_curso")).maskPattern('99/99/9999');

    </script>


