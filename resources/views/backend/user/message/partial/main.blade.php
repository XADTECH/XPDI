<div>
    <p>User ID: {{ $message->user_id }}</p>
    <p>Message: {{ $message->message }}</p>
    <p>Sent at: {{ $message->created_at->format('d M Y, H:i:s') }}</p>
</div>
