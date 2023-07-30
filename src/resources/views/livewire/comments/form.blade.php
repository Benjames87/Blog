<div>
    <x-section-title title="Comments" description="Join the conversation" />
    <form wire:submit.prevent="save">
        <div class="mb-3">
            <x-input  wire:model="body" class="w-full"/>
            <x-input-error for="body"/>
        </div>
        <div class="flex justify-end items-end">
            <x-button class="ml-4" type="submit">{{ __('Save') }}</x-button>
        </div>
    </form>
</div>
