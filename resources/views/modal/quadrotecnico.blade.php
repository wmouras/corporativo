
    <div class="fixed left-0 flex items-center justify-center w-full h-full top-5" x-show="showModalQuadroTecnico">
        <div class="absolute w-full h-full bg-white opacity-90 modal-overlay"></div>

        <div class="fixed z-50 w-full h-full overflow-y-auto modal-container ">

            <div class="absolute top-0 right-0 z-50 flex flex-col items-center mt-4 mr-4 text-sm text-black cursor-pointer modal-close" @click="showModalQuadroTecnico = false">
                <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                  <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                (Esc)
            </div>

        <div class="modal-content container mx-auto h-auto text-left p-4 @click.away="showModalQuadroTecnico = false">

            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h2 class="text-lg font-medium leading-6 text-gray-900">
                Quadro Técnico
                </h2>
            </div>

            <form x-model="frmQT" x-data="registro()" name="frmQuadroTecnico" id="frmQuadroTecnico" x-on-click.prevent = "">

                <div class="w-full h-full py-5 mt-5 overflow-hidden rounded shadow-lg">


                    <div class="flex w-full h-24 px-5 mt-5 mb-10 row">
                       <div class="h-12 mb-4 w-52">
                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='nu_registro'>
                                Registro nº:
                            </label>
                            <input x-on:click.prevent="" x-on:blur="buscarProfissional()" id='nu_registro' name='nu_registro' type='text' placeholder='Nº do registro'
                                class='inline px-4 py-3 mb-3 leading-tight text-center text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                        </div>
                            <div class="h-12 mb-4 w-52">

                            <div id='no_profisional' name='no_profisional' type='text'
                                class='block px-4 py-3 mb-3 leading-tight text-gray-700 border-none rounded appearance-none w-44 focus:outline-none focus:bg-white'> </div>

                        </div>
                    </div>


                    <div class="flex w-full h-24 px-5 mt-5 mb-10 row">
                        <div class="h-12 mb-4 mr-5 w-72">
                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='fk_id_tipo_vinculo'>
                                Tipo Vínculo
                            </label>
                            <!--  -->
                            <select x-on:click.prevent=""  x-model="quadro.fk_id_tipo_vinculo" id='fk_id_tipo_vinculo' name='fk_id_tipo_vinculo' type='text' placeholder='Tipo do vínculo'
                                class='inline w-64 px-4 py-3 mb-3 mr-3 leading-tight text-center text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                <option value="0">Selecione</option>
                                <option value="1">Responsável Técnico</option>
                                <option value="2">Integrante Técnico</option>


                            </select>
                        </div>
                        <div class="h-12 px-5 mb-4 w-72">
                            <label class='block w-full mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='fk_id_regime_trabalho'>
                                Regime de Trabalho
                            </label>
                            <select x-model="quadro.fk_id_regime_trabalho" id='fk_id_regime_trabalho' name='fk_id_regime_trabalho' type='text' placeholder='Regime de trabalho'
                                class='block w-64 px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                @foreach($pessoajuridica->listaRegimeTrabalho as $regimeTrabalho)
                                    <option value="{{ $regimeTrabalho->id_regime_trabalho }}">{{ $regimeTrabalho->regime_trabalho }}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="flex h-24 px-5 mt-5 mb-10 border-0 row w-100">
                        <div class="h-12 mb-4 w-52">
                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='data_inicio'>
                                Data Início
                            </label>
                            <input x-on:click.prevent="" x-model="quadro.data_inicio" id='data_inicio' name='data_inicio' type='text' placeholder='Tipo do vínculo'
                                class='inline px-4 py-3 mb-3 leading-tight text-center text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                        </div>
                            <div class="h-12 mb-4 w-52">
                                <label class='block w-full mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='data_validade'>
                                Data Validade
                            </label>
                            <input x-model="quadro.data_validade" id='data_validade' name='data_validade' type='text' placeholder='Validade do vínculo'
                                class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                        </div>
                        <div class="h-12 mb-4 w-52">
                                <label class='block w-full mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='data_baixa'>
                                Data da Baixa
                            </label>
                            <input x-model="quadro.data_baixa" id='data_baixa' name='data_baixa' type='text' placeholder='Insira uma data'
                                class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                        </div>

                        <div class="h-12 mb-4 w-52">
                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='horario_trabalho'>
                                Horário de Trabalho
                            </label>
                            <input x-on:click.prevent="" x-model="quadro.horario_trabalho" id='horario_trabalho' name='horario_trabalho' type='text' placeholder=''
                                class='inline px-4 py-3 mb-3 leading-tight text-center text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                        </div>
                    </div>

                    <div class="flex h-24 px-5 mt-5 mb-10 border-0 row w-100">

                            <div class="w-1/3 h-12 mb-4">
                                <label class='block w-full mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='observacao'>
                                Observação
                            </label>
                            <textarea x-model="quadro.observacao" id='observacao' name='observacao' placeholder='Insira Observações' rows="3" cols="45"
                                class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                            </textarea>

                        </div>
                    </div>

                    <div class="flex mb-2">

                    </div>

                    <button x-on:click.prevent="salvarQuadroTecnico()" class="inline-flex justify-center w-24 px-3 py-1 mt-8 ml-5 text-white bg-blue-500 rounded-2xl hover:bg-blue-700">
                        <i class="fas fa-check">&nbsp;Incluir</i>
                    </button>

                    <button @click="showModalQuadroTecnico = false" class="inline-flex justify-center px-3 py-1 mt-8 ml-5 text-white bg-yellow-500 w-28 rounded-2xl hover:bg-blue-700">
                        <i class="fas fa-cancel">&nbsp;Cancelar</i>
                    </button>



                </div>

            </form>

        </div>
    </div>
</div>
