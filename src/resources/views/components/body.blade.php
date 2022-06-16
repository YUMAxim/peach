<div class="mb-5 flex flex-col">
    <label for="FlexTextarea">募集内容の詳細</label>
    <div class="FlexTextarea">
        <div class="FlexTextarea__dummy" aria-hidden="true"></div>
        <textarea name="body" id="FlexTextarea" class="FlexTextarea__textarea" placeholder="募集内容の詳細を入力してください" required>{{ old('body', $body) }}</textarea>
    </div>
</div>
