
      <!-- Button (blue), duh! -->
      <!-- Dialog (full screen) -->
      <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="showModal"  >

        <!-- A basic modal dialog with title, body and one button to close -->
        <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="showModal = false">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Modal Title
            </h3>

            <div class="mt-2">
              <p class="text-sm leading-5 text-gray-500">
                Adipisci quasi doloribus. Veniam veritatis dignissimos. Quis maiores ea. Et nulla sunt.
              </p>
          </div>
        </div>

          <!-- One big close button.  --->
          <div class="mt-5 sm:mt-6">
            <span class="flex w-full rounded-md shadow-sm">
              <button @click="showModal = false" class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                Close this modal!
              </button>
            </span>
          </div>

        </div>
      </div>
