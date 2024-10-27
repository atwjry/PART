use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

Route::post('/upload-pdf', function (Request $request) {
    // التحقق من وجود الملف في الطلب
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        
        // حفظ الملف في التخزين المحلي
        $filePath = $file->storeAs('uploads', 'uploaded-file.pdf', 'public');

        // تأكيد أن الملف قد تم رفعه بنجاح
        return response()->json(['status' => 'success', 'path' => $filePath], 200);
    }

    return response()->json(['status' => 'error', 'message' => 'No file uploaded'], 400);
});