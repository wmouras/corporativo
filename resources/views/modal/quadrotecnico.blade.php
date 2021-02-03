
    <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="showModalQuadroTecnico"  >

        <!-- A basic modal dialog with title, body and one button to close -->
        <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="showModalQuadroTecnico = false">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                Quadro Técnico
                </h3>
            </div>

            <form x-model="frmQuadroTecnico" x-data="registro()" name="frmQuadroTecnico" id="frmQuadroTecnico" x-on-click.prevent = "">

                <div class="max-w-lg mt-5 overflow-hidden rounded shadow-lg">

                    <div class="flex h-24 mt-5 mb-10 row">
                        <div class="w-1/5 h-12 mb-4 mr-5">
                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='fk_id_tipo_vinculo'>
                                Tipo Vínculo
                            </label>
                            <!--  -->
                            <input x-on:click.prevent=""  x-model="quadro.fk_id_tipo_vinculo" id='fk_id_tipo_vinculo' name='fk_id_tipo_vinculo' type='text' placeholder='Tipo do vínculo'
                                class='inline px-4 py-3 mb-3 leading-tight text-center text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                        </div>
                            <div class="w-1/3 h-12 mb-4">
                                <label class='block w-full mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='fk_id_regime_trabalho'>
                                Regime de Trabalho
                            </label>
                            <input x-model="quadro.fk_id_regime_trabalho" id='fk_id_regime_trabalho' name='fk_id_regime_trabalho' type='text' placeholder='Regime de trabalho'
                                class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                        </div>
                    </div>

                    <div class="flex h-24 mt-5 mb-10 border-2 row w-100">
                        <div class="w-1/5 h-12 mb-4 mr-5">
                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='data_inicio'>
                                Data Início
                            </label>
                            <input x-on:click.prevent="" x-model="quadro.data_inicio" id='data_inicio' name='data_inicio' type='text' placeholder='Tipo do vínculo'
                                class='inline px-4 py-3 mb-3 leading-tight text-center text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                        </div>
                            <div class="w-1/3 h-12 mb-4">
                                <label class='block w-full mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='data_validade'>
                                Data Validade
                            </label>
                            <input x-model="quadro.data_validade" id='data_validade' name='data_validade' type='text' placeholder='Validade do vínculo'
                                class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                        </div>
                        <div class="w-1/3 h-12 mb-4">
                                <label class='block w-full mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='data_baixa'>
                                Data a Baixa
                            </label>
                            <input x-model="quadro.data_baixa" id='data_baixa' name='data_baixa' type='text' placeholder='Insira uma data'
                                class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                        </div>
                    </div>

                    <div class="flex h-24 mt-5 mb-10 border-2 row w-100">
                        <div class="w-1/5 h-12 mb-4 mr-5">
                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='horario_trabalho'>
                                Horário de Trabalho
                            </label>
                            <input x-on:click.prevent="" x-model="quadro.horario_trabalho" id='horario_trabalho' name='horario_trabalho' type='text' placeholder=''
                                class='inline px-4 py-3 mb-3 leading-tight text-center text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                        </div>
                            <div class="w-1/3 h-12 mb-4">
                                <label class='block w-full mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='observacao'>
                                Observação
                            </label>
                            <input x-model="quadro.observacao" id='observacao' name='observacao' type='text' placeholder='Insira Observações'
                                class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                        </div>
                    </div>

                    <div class="flex mb-2">

                    </div>

                    <button x-on:click.prevent="concluirRegistro()" class="inline-flex justify-center w-24 px-3 py-1 mt-8 ml-5 text-white bg-blue-500 rounded-2xl hover:bg-blue-700">
                        <i class="fas fa-check">&nbsp;Incluir</i>
                    </button>

                </div>

            </form>

        </div>
    </div>
