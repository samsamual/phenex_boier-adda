@extends('frontend.layouts.ecommercemaster')
@section('title','Ebook - Last Read Book')
@section('content')
<section class="my-0 section">
  <div class="container">
    <div class="row">

    @include('mypanel.library.user_header')

      {{-- Main Content --}}
      <div class="col-lg-9">
        <div class="tab-content">
          {{-- purchase book Tab start--}}
            <div class="tab-pane fade {{ $activeTab=='invite'?'show active':'' }}" id="last">
            <div class="card">
              <div class="card-header bg-success text-white">Generate Invite Link</div>
                <div class="card">
                    <div class="card-body">
                        <p>Share this link with your friends to invite them to join:</p>
                        
                        <div class="input-group">
                            <input type="text" id="referral-link" class="form-control" value="{{ url('/registration?ref=' . auth()->id()) }}" readonly>
                            <button class="btn btn-primary" id="copy-button">Copy</button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection


@push('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const copyBtn = document.getElementById('copy-button');
  const referralInput = document.getElementById('referral-link');

  if (!copyBtn || !referralInput) return; // safety guard

  copyBtn.addEventListener('click', async function () {
    const text = referralInput.value || referralInput.textContent || '';
    if (!text) return;

    // Disable button while copying
    copyBtn.disabled = true;
    const originalText = copyBtn.textContent;

    // Helper fallback using temporary textarea + document.execCommand('copy')
    function fallbackCopyToClipboard(str) {
      return new Promise((resolve, reject) => {
        try {
          const textarea = document.createElement('textarea');
          textarea.value = str;
          // Move textarea off-screen
          textarea.setAttribute('readonly', '');
          textarea.style.position = 'absolute';
          textarea.style.left = '-9999px';
          document.body.appendChild(textarea);
          textarea.select();
          textarea.setSelectionRange(0, textarea.value.length); // for mobile
          const ok = document.execCommand('copy');
          document.body.removeChild(textarea);
          ok ? resolve() : reject(new Error('execCommand failed'));
        } catch (err) {
          reject(err);
        }
      });
    }

    // Try Clipboard API, else fallback
    try {
      if (navigator.clipboard && typeof navigator.clipboard.writeText === 'function') {
        await navigator.clipboard.writeText(text);
      } else {
        await fallbackCopyToClipboard(text);
      }

      // success feedback
      copyBtn.textContent = 'Copied!';
      setTimeout(() => {
        copyBtn.textContent = originalText;
        copyBtn.disabled = false;
      }, 2000);

    } catch (err) {
      // final fallback: select input and show instruction
      try {
        referralInput.focus();
        referralInput.select();
      } catch (e) { /* ignore */ }

      alert('Could not copy automatically. Please select the link and press Ctrl/Cmd+C to copy it.');
      copyBtn.textContent = originalText;
      copyBtn.disabled = false;
    }
  });
});
</script>
@endpush

