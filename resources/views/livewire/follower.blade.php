<Li class="flex flex-col md:flex-row text-center">
<div class="stat-item">
    <span class="stat-count">{{ $this->count }}</span>
    <div>
    <button class="stat-label"
        onclick="Livewire.dispatch('openModal', { component: 'follower-model', arguments: { userId: {{ $userId }} } })">

        {{ __('Followers') }}</button>
    </div>
    </div>
</Li>