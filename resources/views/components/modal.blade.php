<!-- modal div -->
<div id="modal" class="hidden">
    <!-- Dialog (full screen) -->
    <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);">

      <!-- A basic modal dialog with title, body and one button to close -->
      <div class="w-1/2 h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0">
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
          <h3 class="text-lg font-medium leading-6 text-gray-900">
            {{ $modalTitle }}
          </h3>

          <div class="mt-2">
            <p class="text-sm leading-5 text-gray-500">
                {{ $modalBody }}
            </p>
        </div>
      </div>

        <!-- One big close button.  --->
        <div class="mt-5 sm:mt-6">
          <span class="flex">
            <button class="btn btn-primary" onclick="closeModal()">
              Cancle
            </button>

            {{-- action button --}}
            <div class="ml-auto">
                {{ $actionLink }}
            </div>
          </span>
        </div>

      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {

        // applies a click event to every element with the name 'open_modal_button'
        let openModalElements = document.querySelectorAll('[name="open_modal_button"]');
        
        for (let index = 0; index < openModalElements.length; index++) {
            const element = openModalElements[index];
            element.addEventListener('click', function() {
                openModal();
                document.getElementById('modal').setAttribute('data-id', this.getAttribute('data-id'));   
            });
        }
    });

    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }
    
  </script>