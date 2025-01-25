# **Clúster Kubernetes con Ansible en AlmaLinux 9** 🚀

Este repositorio contiene los **playbooks de Ansible** necesarios para automatizar la configuración de un clúster Kubernetes en **AlmaLinux 9**. Utilizando un nodo Ansible como orquestador, puedes configurar un nodo master y varios nodos worker sin recurrir a herramientas como Kubespray.

---

## **📊 Tabla de contenidos**

- [🚀 Tecnologías Utilizadas](#%F0%9F%9A%80-tecnologías-utilizadas)
- [📋 Características principales](#%F0%9F%93%8B-características-principales)
- [📋 Requisitos](#%F0%9F%93%8B-requisitos)
- [📂 Estructura del repositorio](#%F0%9F%93%82-estructura-del-repositorio)
- [⚙️ Uso](#%F0%9F%93%99-uso)
- [💡 Contribuciones](#%F0%9F%92%A1-contribuciones)
- [📜 Licencia](#%F0%9F%93%9C-licencia)

---

## **🚀 Tecnologías Utilizadas** 
![Kubernetes](https://img.shields.io/badge/Kubernetes-%20-%23E00000?logo=kubernetes&logoColor=white) ![Ansible](https://img.shields.io/badge/Ansible-%20-%23E10000?logo=ansible&logoColor=white) ![AlmaLinux](https://img.shields.io/badge/AlmaLinux-%20-%2300782C?logo=almalinux&logoColor=white) ![Containerd](https://img.shields.io/badge/Containerd-%20-%23000?logo=containerd&logoColor=white)

### **Tecnologías**:

- **Kubernetes** para la orquestación de contenedores.
- **Ansible** para la automatización de la infraestructura.
- **AlmaLinux 9** como sistema operativo base.
- **Containerd** como runtime de contenedores.
- **Calico** para la gestión de redes en Kubernetes.

---

## **📋 Características principales** 🔧
- Configuración de nodos (swap, SELinux, firewall, módulos del kernel, etc.).
- Instalación de Containerd y herramientas de Kubernetes (kubeadm, kubelet, kubectl).
- Inicialización del clúster y unión de nodos worker.
- Configuración de la red del clúster con **Calico**.
- Despliegue de NFS, **Metallb**, **Metrics Server**, y una web en Kubernetes.

---

## **📋 Requisitos** 🖥️

1. **Virtualización:** Máquinas virtuales en VirtualBox o similar.
2. **Sistema Operativo:** AlmaLinux 9 Minimal en todos los nodos.
3. **Especificaciones mínimas:**
   - Nodo Ansible/Master: 2 GiB RAM, 2 vCPU.
   - Nodo Worker: 1 GiB RAM, 1 vCPU.

---

## **📂 Estructura del repositorio**

```
/discarded                    # Carpeta de pruebas fallidas
/inicluster                   # Configuración de los nodos, clúster y Calico
/nfs                          # Configuración de NFS, Metallb, Metrics Server, Deployment de la Web
/nfs/web                      # Manifiestos y archivos web
inventory.ini                # Inventario de nodos para Ansible
```

---

## **⚙️ Uso**

### **1. Clonar el repositorio**

Primero, clona el repositorio:
```bash
git clone https://github.com/brivaro/ansible
cd ansible
```

### **2. Configurar el inventario**

Edita el archivo `inventory.ini` con las IPs de los nodos en tu entorno.

### **3. Ejecutar los playbooks**

Sigue el orden indicado para ejecutar los playbooks:
```bash
ansible-playbook -i inventory.ini 1-config.yml
ansible-playbook -i inventory.ini 2-installation.yml
ansible-playbook -i inventory.ini 3-inicluster.yml
...
```

### **4. Validar el clúster** ✅

Desde el nodo master, verifica el estado de los nodos:
```bash
kubectl get nodes
```

---

## **💡 Contribuciones**

Si deseas mejorar este proyecto o reportar problemas, por favor abre un **issue** o envía un **pull request**.

---

## **📜 Licencia**

Este proyecto está bajo la **Licencia MIT**. Consulta el archivo `LICENSE` para más detalles.

---

## **⚠️ Notas importantes** ⚠️

- **¡Recuerda!** Asegúrate de tener las máquinas virtuales configuradas correctamente antes de ejecutar los playbooks, ya que algunos pasos pueden depender de la configuración específica de la red.
- **¡Importante!** La configuración de NFS requiere que los servicios estén funcionando correctamente antes de proceder con la instalación de **Metallb** y **Metrics Server**.

---

### **🔧 Badges adicionales**

[![CII Best Practices](https://bestpractices.coreinfrastructure.org/projects/569/badge)](https://bestpractices.coreinfrastructure.org/projects/569)  
[![Go Report Card](https://goreportcard.com/badge/github.com/kubernetes/kubernetes)](https://goreportcard.com/report/github.com/kubernetes/kubernetes)

---