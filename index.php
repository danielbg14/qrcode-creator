<?php
if (isset($_GET['img'])) {
    $img = htmlspecialchars($_GET['img']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QR Code Generator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Check if we're on a page with a QR code (has img parameter)
        <?php if (isset($img)): ?>
        // Store a flag to detect page refresh
        if (!sessionStorage.getItem('qrGenerated')) {
            sessionStorage.setItem('qrGenerated', 'true');
        } else {
            // This is a refresh, redirect to main page
            window.location.href = 'index.php';
        }

        // Listen for keyboard events (F5, Ctrl+R, etc.)
        document.addEventListener('keydown', function(e) {
            // F5 key or Ctrl+R
            if (e.key === 'F5' || (e.ctrlKey && e.key === 'r')) {
                e.preventDefault();
                window.location.href = 'index.php';
            }
        });

        // Listen for beforeunload event (page refresh/close)
        window.addEventListener('beforeunload', function(e) {
            // Clear the flag when leaving the page
            sessionStorage.removeItem('qrGenerated');
        });
        <?php endif; ?>
    </script>
</head>
<body class="bg-gradient-to-tr from-green-100 via-white to-blue-100 min-h-screen flex items-center justify-center font-sans p-4">

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-lg text-center">
        <h1 class="text-3xl font-bold text-green-600 mb-6">QR Code Generator</h1>

        <form action="generate.php" method="POST" class="space-y-4 text-left">
            <div>
                <label for="text" class="block font-medium text-gray-700 mb-1">Text or URL:</label>
                <input type="text" name="text" id="text" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            <div>
                <label for="size" class="block font-medium text-gray-700 mb-1">Size (pixels):</label>
                <input type="number" name="size" id="size" value="200" min="100" max="10000"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            <div>
                <label for="ecc" class="block font-medium text-gray-700 mb-1">Error Correction Level:</label>
                <select name="ecc" id="ecc"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
                    <option value="L">L (Low)</option>
                    <option value="M">M (Medium)</option>
                    <option value="Q">Q (Quartile)</option>
                    <option value="H">H (High)</option>
                </select>
            </div>

            <button type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-semibold shadow-md transition-all duration-200">
                Generate QR Code
            </button>
        </form>

        <?php if (isset($img)): ?>
            <div class="mt-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Your QR Code:</h2>
                <img src="<?php echo $img; ?>" alt="QR Code" class="mx-auto border border-gray-300 rounded-md p-2 bg-gray-50">
                <a href="<?php echo $img; ?>" download
                    class="inline-block mt-4 px-6 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition font-medium">
                    Download QR Code
                </a>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>
