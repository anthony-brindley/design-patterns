# Proxy Pattern

This pattern is designed to control access to resource heavy class instantiation by offering a lightweight substitute (or placeholder). This way, we can make sure we incur heavy resource cost only when needed. 

## References 

[Refactoring Guru](https://refactoring.guru/design-patterns/proxy)
[Youtube](https://youtu.be/NwaabHqPHeM?si=-7rs3YrfatcUpo9P)

### Usages

This pattern introduces a substitute class that conforms to the same necessary interface(s) as the actual target class. However, the substitute class provides conditional access to the methods on the target class so we are able to better optimize and control access to any sensitive or resource heavy requests. For instance, as shown in this code example, we could cache the outcomes of a previously run instance of the request and return that to the requester should it be required at a later date. Obviously, as with any caching, this comes with it's own cache invalidation and management complexities, but that's outside the scope of this example. Alternatively, instead of caching a previous response, we could delay incurring heavy method calls until a more appropriate time. Take the example below:

```php

class TargetClass implements IsDownloader
{
    protected $downloadedData;

    public function __construct(string $url)
    {
        $this->download($url);
    }

    /**
     * This is the method that incurs resource cost as it may be accessing a large file over a slow connection for instance
     */
    protected function download(string $url)
    {
        $data = file_get_contents($url);
        $this->downloadedData = $data;
    }
}

```

Because when we instantiate the class we are immediately initiating the download of the required url - we are unable to optimize when this potentially resource heavy process is triggered. However, by using a proxy, we are able to get around this:

```php

class ProxyTargetClass implements IsDownloader
{
    private ?TargetClass $realTarget = null;
    private ?string $cachedData = null;

    public function __construct(
        private string $url
    ){}

    /**
     * Proxy control: Only triggers the download when it's explicitly needed.
     * Optionally, you could implement caching logic here as well.
     */
    public function download(): string
    {
        if ($this->cachedData) {
            // Return cached data if available
            return $this->cachedData;
        }

        // Lazy load the actual class when needed
        if (!$this->realTarget) {
            $this->realTarget = new TargetClass($this->url);
        }

        $this->cachedData = $this->realTarget->getDownloadedData();
        return $this->cachedData;
    }
}

```

### Explanation:

In this example, ProxyTargetClass acts as a substitute that controls when the download method is called on the actual TargetClass. Rather than immediately incurring the cost of downloading the data, the ProxyTargetClass defers that work until it's necessary—i.e., when download() is called.

If the data has already been downloaded (or cached), the proxy can return the cached version to avoid downloading again, adding a layer of optimization.

The key benefits of the Proxy pattern are:

**Lazy Initialization:** The heavy instantiation (like file downloading) only happens when you actually need it.

**Caching:** The Proxy can handle caching of data, so repeated calls don’t incur the same cost.

**Access Control:** In other implementations, the Proxy could also restrict access to certain methods, checking permissions before forwarding the call to the real object.

### Use Cases

**File Downloading:** As in the example, for cases where resources are fetched from external APIs or file systems, and you want to delay or cache the request.

**Security:** Proxy patterns can restrict access to sensitive data by controlling how and when it can be accessed.

**Logging and Monitoring:** You could log requests or responses in the Proxy to track resource usage or to monitor suspicious behavior.

### Pros and Cons

#### Pros:
- Can significantly improve performance through lazy initialization and caching.
- Helps separate concerns such as caching, logging, and access control without modifying the original class.

#### Cons:
- Adds an additional layer of complexity.
- Cache invalidation can become tricky to manage, especially when dealing with dynamic data.




>This completes the basic introduction to the Proxy pattern, highlighting its flexibility in resource-heavy processes like network requests, file systems, or other external services.