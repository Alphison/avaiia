<div class="steps-header">
    <div class="container">
        <div class="step__wrapper dflex justify-between align-center">
            <div class="step">
                <p class="{{ request()->is('cart') ? 'active' : null }}">{{__('cart.step')}}</p>
            </div>

            <div class="dots row">
                <div class="dot"></div>
            </div>

            <div class="step">
                <p class="{{ request()->is('delivery/*') ? 'active' : null }}">{{__('cart.step2')}}</p>
            </div>

            <div class="dots row">
                <div class="dot"></div>
            </div>

            <div class="step">
                <p class="{{ request()->is('payments/*') ? 'active' : null }}">{{__('cart.step3')}}</p>
            </div>

            <div class="dots row">
                <div class="dot"></div>
            </div>

            <div class="step">
                <p>{{__('cart.step4')}}</p>
            </div>
        </div>
    </div>
</div>
